@props(['type' => 'SUCCESS'])

@if ($type === 'ERROR')
    <div class="border border-red-500 bg-red-100 rounded-lg p-4">
        <h1 class="text-lg text-red-500 font-bold">Error</h1>
        <p class="text-red-500">{{ $slot }}</p>
    </div>
@elseif($type === 'WARNING')   
  <div class="border border-yellow-500 bg-yellow-100 rounded-lg p-4">
        <h1 class="text-lg text-yellow-500 font-bold">Warning</h1>
        <p class="text-yellow-500">{{ $slot }}</p>
    </div>
@elseif($type === 'SUCCESS')
  <div class="border border-green-500 bg-green-100 rounded-lg p-4">
        <h1 class="text-lg text-green-500 font-bold">Success</h1>
        <p class="text-green-500">{{ $slot }}</p>
    </div>
@else
 <div class="border border-blue-500 bg-blue-100 rounded-lg p-4">
        <h1 class="text-lg text-blue-500 font-bold">Info</h1>
        <p class="text-blue-500">{{ $slot }}</p>
    </div>
@endif    