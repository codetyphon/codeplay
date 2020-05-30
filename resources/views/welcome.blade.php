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
    <script crossorigin src="https://unpkg.com/@material-ui/core@latest/umd/material-ui.production.min.js"></script>
    <style>
        body {
            text-align: center;
        }

        .code p {
            margin: 0;
            font-size: 6px;
        }

        p span {
            width: 10px;
            display: inline-block;
        }
        .MuiInput-input{
            letter-spacing: 5px;
        }
    </style>
</head>

<body>
    <div id="app"></div>
</body>
<script type="text/babel" src="/jsx/head.jsx"></script>
<script type="text/babel" src="/jsx/footer.jsx"></script>
<script type="text/babel">
    const {
    colors,
    CssBaseline,
    ThemeProvider,
    Typography,
    Container,
    makeStyles,
    createMuiTheme,
    Box,
    SvgIcon,
    Link,
    Button,
    } = MaterialUI;

    const theme = createMuiTheme({
    palette: {
        primary: {
        main: '#556cd6',
        },
        secondary: {
        main: '#19857b',
        },
        error: {
        main: colors.red.A400,
        },
        background: {
        default: '#fff',
        },
    },
    });

    function App() {
        const name = 'codeplay.buzz';
        const css={
            textAlign:'center',
        }
        return (
            <Container maxWidth="sm">
            <div class="code" style={css}>
                <p>&nbsp;</p>
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
                <p>&nbsp;</p>
                <p><img src="/img/logo.png" /></p>
                <p><img src="/img/qrcode.png" width="120" /><br/>微信扫码，找到更多小伙伴</p>
                <p>&nbsp;</p>
                <Button variant="contained" color="primary" href="/login">
                    使用 github 账号登陆 立刻开始创作
                </Button>

            </div>
            </Container>
        );
    }

    ReactDOM.render(
        <ThemeProvider theme={theme}>
            <CssBaseline />
            <Head />
            <App />
            <Footer />
        </ThemeProvider>,
        document.getElementById('app')
    );
</script>

</html>
