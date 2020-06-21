<!DOCTYPE html>
    <html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>API Rest</title>

        <script src="./app/assets/js/axios/axios.min.js"></script>
        <script src="./app/assets/js/handlebars/handlebars/handlebars-v4.1.0.js"></script>

        <script>
                        
            const api = axios.create({

                baseURL: 'http://165.22.142.228:1602',
                timeout: 10000 // ms

            });            

        </script>

    </head>