
<!-- Add form -->
<div class="posts">
    <h2 class="content-subhead">Ajout d'un kiemtao</h2>
    <section class="post post-form">
        <div class="post-description">
            <form class="pure-form pure-form-aligned" action="" method="post">
                <fieldset>
                    <div class="pure-control-group">
                        <label for="name">Username</label>
                        <input id="name" type="text" 
                               name="username" 
                               placeholder="Username" 
                               readonly="readonly"
                               data-min="4"
                               value="<?= $usernameCookie ?>">
                        <span class="pure-form-message-inline">This is a required field.</span>
                    </div>

                    <div class="pure-control-group">
                        <label for="email">Email</label>
                        <input id="email" 
                               type="email" 
                               name="email" 
                               placeholder="Email Address" 
                               readonly="readonly"
                               data-min="5"
                               value="<?= $emailCookie ?>">
                    </div>

                    <div class="pure-control-group">
                        <label for="title">Titre</label>
                        <input id="title" 
                               type="text"
                               name="title" 
                               placeholder="Titre">
                    </div>

                    <div class="pure-control-group">
                        <label for="message">Message</label>
                        <textarea id="message" 
                                  data-min="1"
                                  name="message" 
                                  placeholder="Message à partager"></textarea>
                    </div>

                    <div class="pure-controls">
                        <button type="submit" class="pure-button pure-button-primary">Submit</button>
                    </div>
                </fieldset>
            </form>
        </div>
        <div id="errors"></div>
    </section>
</div>
<script src="js/app.add.js"></script>