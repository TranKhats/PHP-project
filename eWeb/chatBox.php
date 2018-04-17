<div class="container">
    <div class="row chat-window col-xs-5 col-md-3" id="chat_window_1" style="margin-left:10px;">
        <div class="col-xs-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading top-bar">
                    <div class="col-md-8 col-xs-8">
                        <h3 class="panel-title">
                            <span class="glyphicon glyphicon-comment"></span> Chat</h3>
                    </div>
                    <div class="col-md-4 col-xs-4" style="text-align: right;">
                        <a href="javascript:loadMessager(this);" id="show-hide">
                            <span id="minim_chat_window" class="glyphicon glyphicon-plus icon_minim panel-collapsed"></span>
                        </a>
                    </div>
                </div>
                <div class="panel-body msg_container_base" id="messager">
                    <!-- append message here -->
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                        <span class="input-group-btn">
                            <input type="button" value="Gởi" class="btn btn-primary btn-sm" id="btn-chat">
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>