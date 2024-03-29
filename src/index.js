import express from 'express';
import {Server as WebSocketServer} from 'socket.io';
import http from 'http';
import cors from 'cors'
import { listenerKaraokola } from './karaokola/karaokola.js';
import { RedisClient } from './db/redis.js';

const app = express();
const httpServer = http.createServer(app);
const io = new WebSocketServer(httpServer, {
  cors: {
    origin: '*',
    methods: ['GET', 'POST'],
    credentials: true,
  }
});
app.use(cors());
(async ()=>{
  const client = await new RedisClient().connect();
  console.log('INICIANDO REDIS');
  let res = await client.set('karaokola','');
  res += await client.set('currentKaraokola','');
  console.log('[OK]: ', res)
})();
// Servidor web (rutas)
app.use('/', (req, res) => {
  console.log('Ruta raiz');
  res.status(200).send('Socket en servicio :)')
});


// Servidor Socket
io.on('connection', (socket) => {
  console.log('Cliente contectado ', socket.id);
  listenerKaraokola(io, socket);
  socket.on('disconnect', () => {
    console.log('Cliente desconectado ID: ', socket.id);
  });
});
const port = 3000
httpServer.listen(port, '0.0.0.0');
console.log('Servidor iniciado en el puerto ', port);