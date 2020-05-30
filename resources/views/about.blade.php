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

    class About extends React.Component {
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
                var chick = [
                    '...55.......',
                    '.....5......',
                    '...7888887..',
                    '..788888887.',
                    '..888088808.',
                    '..888886666.',
                    '..8888644444',
                    '..8888645555',
                    '888888644444',
                    '88788776555.',
                    '78788788876.',
                    '56655677776.',
                    '456777777654',
                    '.4........4.'
                ]
                this.textures.generate('chick', { data: chick, pixelWidth: pixelWidth });
                this.add.image(width/2,height/2, 'chick');
            }
        }
        render() {
            return(
                <div>
                    <h2>关于</h2>
                    <p>我是codetyphon，前新京报web前端工程师。</p>
                    <p>codeplay.buzz是我创立的像素艺术社区。</p>
                    <p>你可以使用github登陆，通过字符串来创作像素图。</p>
                    <p id="canvas"></p>
                    <p>未来，你还可以让这些像素动起来，制作成游戏或动画。</p>
                    <h2>技术栈</h2>
                    <p>后端：laravel</p>
                    <p>数据库：mysql</p>
                    <p>前端：react</p>
                    <p>2d引擎：phaser</p>
                </div>
            )
        }
    }

    ReactDOM.render(
        <ThemeProvider theme={theme}>
            <CssBaseline />
            <Nav />
            <Head />
            <About />
            <Footer />
        </ThemeProvider>,
        document.getElementById('app')
    );
</script>
</html>
