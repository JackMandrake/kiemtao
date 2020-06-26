<!-- Login form -->
<div class="posts">
    <h2 class="content-subhead">Connexion</h2>
    <section class="post post-form">
        <div class="post-description">
            <form id="login-form" class="pure-form pure-form-aligned" action="" method="post">
                <fieldset>
                    <div class="pure-control-group">
                        <label for="name">Username</label>
                        <input id="name" data-min="4"  type="text" name="username" value="" placeholder="Username">
                        <span class="pure-form-message-inline">This is a required field.</span>
                    </div>

                    <div class="pure-control-group">
                        <label for="password">Password</label>
                        <input id="password" data-min="3" name="password" type="password" placeholder="Mot de passe">
                    </div>

                    <div class="pure-controls">
                        <button type="submit" class="pure-button pure-button-primary">Se connecter</button>
                    </div>
                </fieldset>
            </form>
        </div>
        <div id="errors"></div>
    </section>
</div>
<script src="js/app.login.js"></script>