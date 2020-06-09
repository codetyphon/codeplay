@extends('layout')

@section('style')
<style>

</style>
@stop

@section('const')
<script type="text/babel">
    const { useState, useEffect, useContext } = React;
    const {Navbar,Nav,NavDropdown,Form,FormControl,Button} = ReactBootstrap;
</script>
@stop

@section('render')
<script type="text/babel">
    function View(){
    let css={
    margin:'10px'
    }
    let code={
    width:'200px',
    margin: '0 auto',
    textAlign: 'center',
    letterSpacing: '2px'
    }
    return(
    <div>
        <h1>{{ $pix->title }}</h1>
        <p><a href="/{{ $pix->user_name }}">{{ $pix->user_name }}</a> 创建于 {{ $pix->time }} </p>
        <p>被访问{{ $pix->view }}次</p>
        <p>像素尺寸{{ $pix->size }}</p>
        <Pix code="{!! $pix->code !!}" size={{!! $pix->size !!}} />
        <p style={code}>{{ $pix->code }}</p>
        <p>&nbsp;</p>
        <Button variant="primary" href="/fork/{{ $pix->pix_id }}">
            fork
        </Button>
        &nbsp;
        <Button variant="primary" href="/new">
            create new
        </Button>
    </div>
    )
    }

    ReactDOM.render(
    <div>
        <Top />
        <View />
        <Footer />
    </div>,
    document.getElementById('app')
    );
</script>
@stop
