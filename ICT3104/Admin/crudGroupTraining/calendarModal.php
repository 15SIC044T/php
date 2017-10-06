<?php
$fetch_trainer = $conn->prepare("SELECT * FROM user WHERE accountTypeID=2");
$fetch_location = $conn->prepare("SELECT * FROM location");
?>
<div class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="error"></div>
                <form class="form-horizontal" id="crud-form">
                    <input id="classid" name="classid" type="hidden" />
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="title">Title</label>
                        <div class="col-md-6">
                            <input id="title" name="title" type="text" class="form-control input-md border-input" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="time">Start Time</label>
                        <div class="col-md-6 input-append bootstrap-timepicker">
                            <input id="time" name="time" type="text" class="form-control input-md border-input" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="duration">Duration</label>
                        <div class="col-md-6 input-append">
                            <select class="form-control input-md border-input" id="duration" name="duration" >
                                <option value="1">1 Hour</option>
                                <option value="2">2 Hour</option>
                                <option value="3">3 Hour</option>
                                <option value="4">4 Hour</option>
                                <option value="5">5 Hour</option>
                            </select>
<!--                            <input id="duration" name="duration" type="number" class="form-control input-md border-input" />-->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="userid">Trainer In Charge</label>
                        <div class="col-md-6 input-append">
                            <select class="form-control input-md border-input" id="userid" name="userid">
                                <?php
                                $fetch_trainer->execute();
                                $resultTrainer = $fetch_trainer->get_result();
                                while ($row = $resultTrainer->fetch_assoc()) {
                                    echo '<option value="' . $row['userID'] . '"> ' . $row['name'] . '</option>';
                                }
                                ?>
                            </select>
                            <!--<input id="userid" name="userid" type="number" class="form-control input-md border-input" />-->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="locationid">Location</label>
                        <div class="col-md-7 input-append">
                            <select class="form-control input-md border-input" id="locationid" name="locationid">
                                <?php
                                $fetch_location->execute();
                                $result = $fetch_location->get_result();
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row['locationID'] . '"> ' . $row['locationName'] . '</option>';
                                }
                                ?>
                            </select>
<!--                            <input id="locationid" name="locationid" type="number" class="form-control input-md border-input" />-->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="description">Description</label>
                        <div class="col-md-6">
                            <textarea class="form-control border-input" id="description" name="description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="capacity">Capacity</label>
                        <div class="col-md-6">
                            <input id="capacity" name="capacity" type="number" class="form-control input-md border-input" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="cost">Cost</label>
                        <div class="col-md-6">
                            <input id="cost" name="cost" type="number" class="form-control input-md border-input" />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>