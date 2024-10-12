<div class="bg-red-200 p-4 rounded-md shadow-md w-full">
    <form action="">
        <input type="text" value="{{$category->name}}">
        <input type="text" value="{{$category->color}}">
        <input type="text">
    </form>
    <button wire:click="CloseModal">
clkosemodal
    </button>
</div>
