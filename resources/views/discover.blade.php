@extends('layout')

@section('style')
<style>
    .cards{
        width: 1000px;
        text-align: center;
        margin: 10px auto;
    }
    .card{
        position: relative;
        display: inline-flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 300px;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0,0,0,.125);
        border-radius: .25rem;
        width: 300px;
        margin: 10px;
    }
    .author{
        margin-bottom: 10px;
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

    <p>&nbsp;</p>
    <div className="cards">
    @foreach($pixs as $pix)
    <Card>
        <Card.Body>
            <Card.Title>{{ $pix->title }}</Card.Title>
            <Card.Text>
            <a href="/{{ $pix->username }}"><div className="author">作者：<img src="{{ $pix->avatar }}" width="30" height="30" /> {{ $pix->username }}</div></a>
            <a href="/pix/{{ $pix->pix_id }}">
            <Pix className="pix" size={"{{ $pix->size }}"} id={"{{ $pix->pix_id }}"} code="{!! $pix->code !!}" />
            </a>
            </Card.Text>
            <Button href="/pix/{{ $pix->pix_id }}" variant="primary">点击查看详细</Button>

        </Card.Body>
    </Card>
    @endforeach
    </div>
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
