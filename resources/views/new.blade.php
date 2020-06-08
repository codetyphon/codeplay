@extends('layout')

@section('style')
<style>

</style>
@stop

@section('const')
<script type="text/babel">
    const { useState, useEffect, useContext } = React;
    const {Button,FormControl,Modal,Navbar,Nav,NavDropdown} = ReactBootstrap;
</script>
@stop

@section('render')
<script type="text/babel">
    ReactDOM.render(
        <div>
            <Top />
            <Head />
            <PixEdit title="未命名像素画" id="0" code="{!! $code !!}" token="{{ csrf_token() }}" />
            <Footer />
        </div>,
        document.getElementById('app')
    );
</script>
@stop
