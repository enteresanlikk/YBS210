const http = require('http');

const app = http.createServer((req, res) => {
    res.writeHead(200, {
        'Content-Type': 'text/html; charset=utf-8;'
    });
    const html = `
    <h1>203502077 - Bilal Demir</h1>
    <br>
    <b>Çok güzel bir gün. Şu an saat kaç?</b>
    `;
    res.write(html);
    res.end();
});

const port = process.env.PORT || 3030;
app.listen(port, () => {
    console.log(`http://localhost:${port}`);
});