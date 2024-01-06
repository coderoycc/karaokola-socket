import { RedisClient } from "../db/redis.js";
/**
 * @returns JSON con la lista [{id,tipo,detalle,url},{},{}]
 */
export async function getListKaraokola(){
  try {
    const redis = await new RedisClient().connect();
    const list = await redis.get('karaokola');
    return `[${list}]`;
  } catch (error) {
    console.log('[ERROR KARAOKOLA] get list', error)
  }
  return '[]';
}

export async function initVideoActual(){
  const dataDefault = {
    id: '',
    tipo: '',
    usuario: '',
    descripcion: ' Sin video actual',
    ruta: '',
    play: false,
    volumen: 50
  }
  try {
    const redis = await new RedisClient().connect();
    const video = await redis.get('currentKaraokola');
    let res = {}
    if(video == '' || video == null ){
      res = dataDefault;
    }else{
      res = JSON.parse(video)
      res.play = false;
    }
    res = JSON.stringify(res)
    await redis.set('currentKaraokola', res)
    return res;
  } catch (error) {
    console.log('[ERROR INIT VIDEO ACTUAL]', error)
  }
  return JSON.stringify(dataDefault);
}

/**
 * @param {string} data JSON de la forma {id, tipo, detalle, url} 
 * @returns {int} respuesta de redis
 */
export async function appendItem(data){
  try {
    const redis = await new RedisClient().connect();
    let list = await redis.get('karaokola');
    if(list) // cuando existe la lista
      list = list+`,${data}`;
    else
      list = data;
    return await redis.set('karaokola', list);
  } catch (error) {
    console.log('[ERROR KARAOKOLA] append item', error)
  }
  return 0;
}

/**
 * 
 * @param {string} data JSON de la forma [{id, tipo, detalle, url},{}...]
 * @returns {int} respuesta de redis 
 */
export async function refreshList(data){
  try {
    const redis = await new RedisClient().connect();
    let clean = data.replace('[','').replace(']','');
    return await redis.set('karaokola', clean);
  } catch (error) {
    console.log('[ERROR KARAOKOLA] refresh list', error)
  }
  return 0;
}

export async function playVideo(){
  try {
    const redis = await new RedisClient().connect();
    let currentVideo = await redis.get('currentKaraokola');
    currentVideo = JSON.parse(currentVideo)
    if(currentVideo.id == '' || currentVideo.ruta == ''){
      // sacamos un nuevo video de la lista
      let videos = await redis.get('karaokola')
      videos = JSON.parse(`[${videos}]`)
      if(videos.length > 0){
        currentVideo = {...videos.shift(), play:true, volumen: 50}
        await redis.set('currentKaraokola', JSON.stringify(currentVideo))
        videos = JSON.stringify(videos)
        videos = videos.replace('[','').replace(']','')
        await redis.set('karaokola', videos)
        return currentVideo;
      }else{
        return '';  // cadena vacia cuando no exista videos en cola
      }
    }else{
      currentVideo.play = !currentVideo.play;
      console.log('currentVideo PLAY', currentVideo)
      currentVideo = JSON.stringify(currentVideo)
      await redis.set('currentKaraokola', currentVideo)
    }
    return currentVideo;
  } catch (error) {
    console.log('[ERROR KARAOKOLA] get current video', error)
  }
  return '';
}

export async function nextVideo(){
  try {
    let videos = await getListKaraokola();
    videos = JSON.parse(videos);
    if(videos.length > 0){
      let currentVideo = {...videos.shift(), play: true, volumen: 50 };
      console.log('VIDEO a reproducir', currentVideo)
      currentVideo = JSON.stringify(currentVideo)
      const redis = await new RedisClient().connect();
      await redis.set('currentKaraokola', currentVideo)
      console.log('VIDEOS: ', videos)
      videos = JSON.stringify(videos)
      videos = videos.replace('[','').replace(']','')
      console.log('VIDEOS STRING', videos)
      await redis.set('karaokola', videos)
      return currentVideo; 
    }else{
      throw new Error('No hay videos en cola');
    }
  } catch (error) {
    console.log('[ERROR KARAOKOLA NEXT VIDEO]', error)
  }
  return '';
}