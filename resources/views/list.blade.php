@extends('layout')

@section('style')
<style>
    .card-img-top {
        width: 100px;
        margin: 10px auto;
    }
</style>
@stop

@section('const')
<script type="text/babel">
    const { useState, useEffect, useContext } = React;
    const {ListGroup,Button,Navbar,Nav,NavDropdown,Card} = ReactBootstrap;
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
            <div class="code" style={css}>
                <h1>welcome to {name}</h1>
                <p>一个使用字符串创作像素图的社区</p>
                <p>&nbsp;</p>
                <Card>
                <Card.Img variant="top" src="{{ $user->avatar }}" />
                <Card.Body>
                    <Card.Title>{{ $user->name }}</Card.Title>
                    <Card.Text>
                    {{ $user->bio }}
                    </Card.Text>
                </Card.Body>
                </Card>
                <ListGroup defaultActiveKey="">
                @foreach($pixs as $pix)
                <ListGroup.Item action href="/pix/{{ $pix->id }}" key="{{ $pix->id }}">
                {{ $pix->title }}
                <Pix id={"{{ $pix->id }}"} code="{!! $pix->code !!}"/>
                </ListGroup.Item>
                @endforeach
                </ListGroup>
                <p>{!! $pixs->links() !!}</p>
            </div>
        );
    }

    ReactDOM.render(
        <div>
            <Top />
            <App />
            <Footer />
        </div>,
        document.getElementById('app')
    );
</script>
@stop
