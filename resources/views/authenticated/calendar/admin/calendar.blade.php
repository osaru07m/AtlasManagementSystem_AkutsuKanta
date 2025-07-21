<x-sidebar>
<div class="vh-100 p-2" style="background:#ECF1F6;">
  <div class="w-75 m-auto pt-5 pb-5 px-3 shadow" style="border-radius:5px; background:#FFF;">
    <div class="w-100 m-auto" style="border-radius:5px;">
      <p class="text-center fs-4 mt-2 mb-0">{{ $calendar->getTitle() }}</p>
      <div>
        {!! $calendar->render() !!}
      </div>
    </div>
  </div>
</div>
</x-sidebar>
