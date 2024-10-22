@props([
    'title' => '',
    'icon' => ''
    ]
)
<div>
    <div class="card">
        <div class="card-header"><i class="fas fa-{{ $icon }}"></i> {{ $title }}</div>
        
        <div class="card-body">
            {{ $slot }}
        </div>
    </div>
</div>
