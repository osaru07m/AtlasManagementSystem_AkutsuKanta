<x-sidebar>
<div class="w-100 min-vh-100 d-flex" style="align-items:center; justify-content:center;">
  <div class="w-100 min-vh-100 border p-5">
    <div class="w-75 mx-auto pt-5 pb-5 px-3 shadow" style="border-radius:5px; background:#FFF;">
      <p class="text-center fs-4 mt-2 mb-0">{{ $calendar->getTitle() }}</p>
      {!! $calendar->render() !!}
      <div class="adjust-table-btn m-auto text-end mt-3">
        <input type="submit" class="btn btn-primary" value="登録" form="reserveSetting" onclick="return confirm('登録してよろしいですか？')">
      </div>
    </div>
  </div>
</div>
</x-sidebar>
