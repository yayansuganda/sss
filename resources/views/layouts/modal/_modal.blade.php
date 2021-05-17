<div class="modal fade" id="modal" >
        <div class="{!! (Request::segment(1) == 'upload_file') || (Request::segment(1) == 'perusahaan') ?  "modal-dialog" : "modal-dialog modal-lg" !!}" >
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" name="modal-body"  id="modal-body">


                </div>

                 <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="modal-btn-save"></button>
            </div>
            </div>

        </div>
    </div>
