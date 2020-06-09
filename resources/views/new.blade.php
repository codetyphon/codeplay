@extends('layout')

@section('style')
<style>
    .flex {
        flex-direction: row;
        align-items: center;
        display: inline-flex;
    }

    .edit {
        width: 300px;
    }
</style>
@stop

@section('const')
<script type="text/babel">
    const { useState, useEffect, useContext } = React;
    const {Button,FormControl,Modal,Navbar,Nav,NavDropdown,InputGroup} = ReactBootstrap;
</script>
@stop

@section('render')
<script type="text/babel">
    ReactDOM.render(
        <div>
            <Top />
            <p><br/></p>
            <PixEdit title="{{ $title }}" id="0" size="{{ $size }}" code="{!! $code !!}" token="{{ csrf_token() }}" />
            <Footer />
        </div>,
        document.getElementById('app')
    );
</script>
@stop
