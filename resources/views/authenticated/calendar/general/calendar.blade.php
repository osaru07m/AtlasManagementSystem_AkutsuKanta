<x-sidebar>
<div class="vh-100 p-2" style="background:#ECF1F6;">
  <div class="border w-75 m-auto pt-5 pb-5 px-3" style="border-radius:5px; background:#FFF;">
    <div class="w-100 m-auto border" style="border-radius:5px;">

      <p class="text-center fs-4 mt-2 mb-0">{{ $calendar->getTitle() }}</p>
      <div class="">
        {!! $calendar->render() !!}
      </div>
    </div>
    <div class="text-end w-100 mt-3">
      <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts">
    </div>
    <div class="modal js-modal">
      <div class="modal__bg js-modal-close"></div>
      <div class="modal__content">
        <form action="{{ route('deleteParts') }}" method="post">
          <div class="w-100">
            <div class="modal-inner-title w-50 m-auto">
              下記の予約をキャンセルします。よろしいですか？
            </div>
            <div class="modal-inner-body w-50 m-auto pt-3 pb-3 d-flex flex-column gap-2">
              <div class="d-flex justify-content-center align-items-center gap-2">
                <label class="text-nowrap">予約日時</label>
                <input name="delete_date" class="delete-modal-reserve-date form-control-plaintext w-75" readonly></input>
              </div>
              <div class="d-flex justify-content-center align-items-center gap-2">
                <label class="text-nowrap">予約部</label>
                <input class="delete-modal-reserve-part form-control-plaintext w-75" readonly></input>
              </div>
            </div>
            <div class="w-50 m-auto edit-modal-btn d-flex">
              <a class="js-modal-close btn btn-secondary d-inline-block" href="">閉じる</a>
              <input type="hidden" class="delete-modal-reserve-id" name="id" value="">
              <input type="submit" class="btn btn-danger d-block" value="キャンセルする">
            </div>
          </div>
          {{ csrf_field() }}
        </form>
      </div>
    </div>
  </div>
</div>
</x-sidebar>
