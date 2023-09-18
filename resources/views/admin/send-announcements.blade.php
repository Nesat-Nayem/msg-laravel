@extends('admin.layouts.app')
@section('content')
<div class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="section-header d-flex justify-content-between">
                                <h2>Announcements</h2>
                                <a href="{{ route('admin-pushnotifications.index') }}" class="btn btn-primary" style="height: 34px; border-radius: 30px;"><i class="fa fa-arrow-left me-2"></i>Back</a>
                            </div>
                            <form>
                                <div class="service-fields mb-3 mt-2">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Subject</label>
                                                <input class="form-control" type="text" />
                                            </div>
                                            <div class="form-group">
                                                <label>Message</label>
                                                <textarea class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Send To</label><br>
                                                <input type="checkbox" id="selectall" name="sendto" value="Bike" class="chk" onchange="checkAll(this)">
                                                <label for="selectall">Select All</label><br>
                                                <input type="checkbox" id="user" name="sendto" value="Car">
                                                <label for="user">User</label><br>
                                                <input type="checkbox" id="provider" name="sendto" value="Boat">
                                                <label for="provider">Provider</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-start">
                                    <button class="btn btn-primary submit-btn" type="submit">
                                        Submit
                                    </button>
                                    <button class="btn btn-danger submit-btn" type="reset">
                                        Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')

<script>
    function checkAll(ele) {
        var checkboxes = document.getElementByClass('chk');
        if (ele.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = true;
                }
            }
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
                console.log(i)
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = false;
                }
            }
        }
    }

</script>
@endsection
