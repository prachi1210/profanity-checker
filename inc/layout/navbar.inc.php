<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Profanity Checker</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                <li><a data-toggle="modal" data-target="#myModal">Instructions</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Profanity Checker</h4>
            </div>
            <div class="modal-body text-justify">
                <strong>Profanity Checker</strong> is a PHP based web-app to check large text blocks for NSFW content.<br>
                <hr>
                How to use:
                <ul>
                    <li>
                        <strong>Standard Mode</strong><br>
                        <pre>Examines the piece of text against the <a href="https://en.wikipedia.org/wiki/WDYL_(search_engine)">What Do You Love</a>Project by Google that has now been depriciated</pre>
                    </li>
                    <li>
                        <strong>Custom Check</strong><br>
                        <pre>Allows you to create a custom database of words that you may deem inappropriate. This database keeps updating each time you enter a list of word. Entries are retained even after search. The Custom list takes words separated by a space. Eg: Input should be of type 'random words check' to check for 'random', 'words' and'check.</pre>
                    </li>
                    <li>
                        <strong>Selective Removal</strong><br>
                        <pre>Allows you to search for certain custom words but doesn't save them in database. If you want to avoid entering the same words again and again, use the create custom check mode.</pre>
                    </li>
                </ul>  

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<br><br><br>
