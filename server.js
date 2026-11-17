const express = require('express');
const app = express();
app.get('/', (_req, res) => res.send('fh-starter node ok on node ' + process.version));
app.listen(Number(process.env.PORT) || 3000, '0.0.0.0');
