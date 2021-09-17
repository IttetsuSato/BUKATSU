<div id="input-form">
  <div id="image-area">
      <label>
          <input type="file" id="image" name="image" accept="image/*" class="image">
          <div id="image-style">
              <p>===========サーバへ送る前のプレビュー画像================</p>
              <img src="" alt="プロフィール画像" id="image-output">
          </div>
      </label>
  </div>
  <div id="main">
      <div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                  <div id="upload-demo" class="center-block"></div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="modal-btn-cancel" data-dismiss="modal">キャンセル</button>
                  <button type="button" id="cropImageBtn" class="modal-bton-crop">決定</button>
              </div>
              </div>
          </div>
      </div>
  </div>
  <input type="hidden" id="cropImage" name="cropImage" value="" />
  <button type="submit" name="action" value="send">送信</button>
</div>