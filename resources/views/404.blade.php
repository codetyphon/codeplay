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
    function PageNotFound(){
    return(
        <div>
            <h1>404</h1>
            <p>页面没有被创建，或已经被删除。</p>
        </div>
    )

    }

    ReactDOM.render(
    <div>
    <Top />
    <PageNotFound />
    <Footer />
    </div>,
    document.getElementById('app')
    );
</script>
@stop
