@extends('layout')

@section('style')
<style>
    img {
        width: 100px;
    }
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
    function App() {
        const name = 'codeplay.buzz';
        const css={
            textAlign:'center',
        }
        return (
            <ListGroup defaultActiveKey="">
            @foreach($users as $user)
            <ListGroup.Item action href="/{{ $user->name }}">
            <img src="{{ $user->avatar }}" title="{{ $user->name }}" />
            <p>{{ $user->bio }}</p>
            <p><a href="{{ $user->name }}">查看 {{ $user->name }} 的所有作品</a></p>
            </ListGroup.Item>
            @endforeach
            </ListGroup>
        );
    }
    ReactDOM.render(
        <div>
            <Top />
            <Head />
            <App />
            <Footer />
        </div>,
        document.getElementById('app')
    );
</script>
@stop
