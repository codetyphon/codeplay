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
    <script src="//cdn.jsdelivr.net/npm/phaser@3.23.0/dist/phaser.min.js"></script>
    <style>
        body{
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
    Container,
    makeStyles,
    createMuiTheme,
    Box,
    SvgIcon,
    Link,
    Button,
    Avatar,
    AppBar,
    Toolbar,
    IconButton,
    MenuIcon,
    Typography,
    Card,
    CardActionArea,
    CardMedia,
    CardContent,
    CardActions,
    List,
    ListSubheader,
    ListItem,
    ListItemText
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

    function Nav(){
        return(
            <AppBar position="static">
                <Toolbar>
                    @if(session()->get('user'))
                    <Avatar alt="" src="{{ session()->get('user')->avatar }}" />
                    <Typography variant="h6">
                        &nbsp;&nbsp;&nbsp;{{ session()->get('user')->name }}
                    </Typography>
                    <Button color="inherit" href="/logout">退出</Button>
                    @else
                    <Button color="inherit" href="/login">登陆</Button>
                    @endif
                </Toolbar>
            </AppBar>
        );
    }

    function App() {
        const name = 'codeplay.buzz';
        const css={
            textAlign:'center',
        }
        return (
            <Container maxWidth="sm">
            <div class="code" style={css}>
                <p>&nbsp;</p>
                <Card>
                    <CardActionArea>
                        <CardMedia
                        image="{{ $pix->avatar }}"
                        title="{{ $pix->user_name }}"
                        />
                        <CardContent>
                        <Typography gutterBottom variant="h5" component="h2">
                            {{ $pix->user_name }}
                        </Typography>
                        </CardContent>
                    </CardActionArea>
                    <CardActions>
                    {{ $pix->user_bio }}
                    </CardActions>
                </Card>
            </div>
            </Container>
        );
    }

    class Pix extends React.Component {
        componentDidMount(){
            let width=200;
            let height=200;
            var config = {
                    type: Phaser.CANVAS,
                    parent: 'canvas',
                    width: width,
                    height: height,
                    backgroundColor: '#fff',
                    scene: {
                        create: create
                    }
            };

            var game = new Phaser.Game(config);

            function create (){
                var pixelWidth = 10;
                var pixelHeight = 10;
                var chick = [{!! $pix->code !!}];
                this.textures.generate('chick', { data: chick, pixelWidth: pixelWidth });
                this.add.image(width/2,height/2, 'chick');
            }
        }
        render() {
            let css={
                margin:'10px'
            }
            let code={
                width:'120px',
                margin: '0 auto',
                textAlign: 'center',
                letterSpacing: '2px'
            }
            return(
                <div>
                    <h1>{{ $pix->title }}</h1>
                    <p><a href="/{{ $pix->user_name }}">{{ $pix->user_name }}</a> 创建于 {{ $pix->time }} </p>
                    <p>被访问{{ $pix->view }}次</p>
                    <h3>code:</h3>
                    <p style={code}>{{ $pix->code }}</p>
                    <h3>canvas:</h3>
                    <div style={css} id="canvas"></div>

                    <p>&nbsp;</p>
                    <Button variant="contained" color="primary" href="/fork/{{ $pix->pix_id }}">
                        fork
                    </Button>
                    &nbsp;
                    <Button variant="contained" color="primary" href="/new">
                        create new
                    </Button>
                </div>
            )
        }
    }

    ReactDOM.render(
        <ThemeProvider theme={theme}>
            <CssBaseline />
            <Nav />
            <Head />
            <Pix />
            <Footer />
        </ThemeProvider>,
        document.getElementById('app')
    );
</script>
</html>
