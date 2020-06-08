<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-<span></span>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>codeplay.buzz</title>
    <script crossorigin src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
    <script crossorigin src="https://unpkg.com/babel-standalone@latest/babel.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,00,00,00&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
    <script src="https://unpkg.com/react-bootstrap@next/dist/react-bootstrap.min.js" crossorigin></script>
    <script src="http://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
            width: 90%;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        h2 {
            font-size: 50px;
        }

        .code{
            margin-top: 30px;
        }

        p {
            font-size: 20px;
        }

        .code p {
            margin: 0;
            font-size: 6px;
        }

        p span {
            width: 10px;
            display: inline-block;
        }

        .flex {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .to {
            font-size: 40px;
            margin: 0px 0px 0px 20px;
        }
    </style>
</head>

<body>
    <div id="app"></div>
</body>
<script type="text/babel">
    const { useState, useEffect, useContext } = React;
    const {Button} = ReactBootstrap;
</script>
<script type="text/babel" src="/jsx/head.jsx?v=1"></script>
<script type="text/babel" src="/jsx/footer.jsx"></script>
<script type="text/babel">
    function App() {
        const name = 'codeplay.buzz';
        const css={
            textAlign:'center',
        }
        return (
            <div className="flex-center position-ref full-height">
            <div className="content">
                <div className="title m-b-md">
                <Head />
                <div className="code" style={css}>

                <div className="flex">

                    <div className="chars">
                    <p><span>'</span><span>.</span><span>.</span><span>.</span><span>5</span><span>5</span><span>.</span><span>.</span><span>.</span><span>.</span><span>.</span><span>.</span><span>.</span><span>'</span>,</p>
                    <p><span>'</span><span>.</span><span>.</span><span>.</span><span>.</span><span>.</span><span>5</span><span>.</span><span>.</span><span>.</span><span>.</span><span>.</span><span>.</span><span>'</span>,</p>
                    <p><span>'</span><span>.</span><span>.</span><span>.</span><span>7</span><span>8</span><span>8</span><span>8</span><span>8</span><span>8</span><span>7</span><span>.</span><span>.</span><span>'</span>,</p>
                    <p><span>'</span><span>.</span><span>.</span><span>7</span><span>8</span><span>8</span><span>8</span><span>8</span><span>8</span><span>8</span><span>8</span><span>7</span><span>.</span><span>'</span>,</p>
                    <p><span>'</span><span>.</span><span>.</span><span>8</span><span>8</span><span>8</span><span>0</span><span>8</span><span>8</span><span>8</span><span>0</span><span>8</span><span>.</span><span>'</span>,</p>
                    <p><span>'</span><span>.</span><span>.</span><span>8</span><span>8</span><span>8</span><span>8</span><span>8</span><span>6</span><span>6</span><span>6</span><span>6</span><span>.</span><span>'</span>,</p>
                    <p><span>'</span><span>.</span><span>.</span><span>8</span><span>8</span><span>8</span><span>8</span><span>6</span><span>4</span><span>4</span><span>4</span><span>4</span><span>4</span><span>'</span>,</p>
                    <p><span>'</span><span>.</span><span>.</span><span>8</span><span>8</span><span>8</span><span>8</span><span>6</span><span>4</span><span>5</span><span>5</span><span>5</span><span>5</span><span>'</span>,</p>
                    <p><span>'</span><span>8</span><span>8</span><span>8</span><span>8</span><span>8</span><span>8</span><span>6</span><span>4</span><span>4</span><span>4</span><span>4</span><span>4</span><span>'</span>,</p>
                    <p><span>'</span><span>8</span><span>8</span><span>7</span><span>8</span><span>8</span><span>7</span><span>7</span><span>6</span><span>5</span><span>5</span><span>5</span><span>.</span><span>'</span>,</p>
                    <p><span>'</span><span>7</span><span>8</span><span>7</span><span>8</span><span>8</span><span>7</span><span>8</span><span>8</span><span>8</span><span>7</span><span>6</span><span>.</span><span>'</span>,</p>
                    <p><span>'</span><span>5</span><span>6</span><span>6</span><span>5</span><span>5</span><span>6</span><span>7</span><span>7</span><span>7</span><span>7</span><span>6</span><span>.</span><span>'</span>,</p>
                    <p><span>'</span><span>4</span><span>5</span><span>6</span><span>7</span><span>7</span><span>7</span><span>7</span><span>7</span><span>7</span><span>6</span><span>5</span><span>4</span><span>'</span>,</p>
                    <p><span>'</span><span>.</span><span>4</span><span>.</span><span>.</span><span>.</span><span>.</span><span>.</span><span>.</span><span>.</span><span>.</span><span>4</span><span>.</span><span>'</span></p>
                    </div>
                    <div className="to">=></div>
                    <p><img src="/img/logo.png" /></p>
                </div>

                <Button variant="info" href="/discover">
                    发现 立刻探索像素艺术世界
                </Button>

            </div>
            <Footer />
                </div>
            </div>
        </div>

        );
    }

    ReactDOM.render(
        <div>

            <App />

        </div>,
        document.getElementById('app')
    );
</script>

</html>
