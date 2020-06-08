@extends('layout')

@section('style')
<style>

</style>
@stop

@section('const')
<script type="text/babel">
    const { useState, useEffect, useContext } = React;
    const {ListGroup,Button,Navbar,Nav,NavDropdown} = ReactBootstrap;
</script>
@stop

@section('render')
<script type="text/babel">
    function About () {
            const code=`
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
                    '.4........4.'`;
            return(
                <div>
                    <h2>关于</h2>
                    <p>我是codetyphon，前新京报web前端工程师。</p>
                    <p>codeplay.buzz是我创立的像素艺术社区。</p>
                    <p>你可以使用github登陆，通过字符串来创作像素图。</p>
                    <p><Pix id="0" code={code} /></p>
                    <p>未来，你还可以让这些像素动起来，制作成游戏或动画。</p>
                    <h2>技术栈</h2>
                    <p>后端：laravel</p>
                    <p>数据库：mysql</p>
                    <p>前端：react</p>
                    <p>2d引擎：phaser</p>
                </div>
            )
    }

    ReactDOM.render(
        <div>
            <Top />
            <Head />
            <About />
            <Footer />
        </div>,
        document.getElementById('app')
    );
</script>
@stop
