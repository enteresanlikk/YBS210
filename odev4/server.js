const express = require('express');
const axios = require('axios');
const app = express();

const createApiUrl = (lat, lon) => {
    let url = new URL('https://api.openweathermap.org/data/2.5/weather');
    url.searchParams.append('appid', '90bf1f6964f09d9036c80992c58550d7');
    url.searchParams.append('units', 'metric');
    url.searchParams.append('lat', lat);
    url.searchParams.append('lon', lon);

    return url.toString();
}

const weatherApi = async ({ city, lat, lon }) => {
    try {
        const requestUrl = createApiUrl(lat, lon);

        const { data } = await axios.get(requestUrl);

        return {
            city,
            value: data.main.temp
        };
    } catch(e) {
        console.log(e);
    }
    return null;
}

const locations = [
    {
        city: 'Ankara',
        lat: '39.925533',
        lon: '32.866287'
    },
    {
        city: 'İstanbul',
        lat: '41.015137',
        lon: '28.979530'
    },
    {
        city: 'İzmir',
        lat: '38.423733',
        lon: '27.142826'
    },
    {
        city: 'Adana',
        lat: '37.000000',
        lon: '35.321335'
    }
];

app.get('/', async (req, res) => {
    try {
        let promises = [];
        locations.map(item => {
            const promise = weatherApi(item);
            promises.push(promise);
        });

        const values = await Promise.all(promises);
    
        values.sort((a, b) => {
            return b.value - a.value;
        });
    
        const retVal = {
            best: values[0],
            others: values.slice(1)
        };
    
        return res.json({
            success: true,
            message: 'ok',
            data: retVal
        });
    } catch(e) {
        return res.json({
            success: false,
            message: 'error',
            data: null
        });
    }
});

const port = process.env.PORT || 3030;
app.listen(port, () => {
    console.log(`http://localhost:${port}`);
});