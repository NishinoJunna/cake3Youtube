<?php $this->prepend('script', $this->Html->script('admin_playlist')); ?>

<div id="container">
        <div id="loading"></div>
        <div id="header">
            <form>
                <input type="text" id="keyword" value="AKB48" />
                <input type="button" value="検索" id="btn" disabled="disabled" />
            </form>
        </div>
        <div id="main_box" class="clearfix">
            <div id="main" class="pull-left"></div>
            <div id="related" class="pull-left"></div>
        </div>
    </div>
    <script src="https://apis.google.com/js/client.js?onload=googleApiClientReady" ></script>