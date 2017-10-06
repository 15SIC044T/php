        <!--modal-->
        <div id="pwdModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h2 class="text-center">What's My Password?</h2>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form id="rform" action="ForgetPasswordProcess.php" method="POST">
                                        <div class="text-center">
                                            <p>If you have forgotten your password you can reset it here.</p>
                                            <div class="panel-body">
                                                <fieldset>
                                                    <div class="form-group">
                                                        <input class="form-control input-lg" placeholder="E-mail Address" id="emailFp" name="emailFp" type="email" required="required">
                                                    </div>
                                                    <input class="btn btn-lg btn-primary btn-block" value="Send My Password" type="submit">
                                                </fieldset>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                        </div>	
                    </div>
                </div>
            </div>
        </div>
