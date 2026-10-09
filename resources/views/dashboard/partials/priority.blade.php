@php
$priorityConfig = [
'high' => [
'label' => 'Haute',
'classes' => 'bg-red-50 text-red-700 ring-red-600/20',
'dot' => 'bg-red-500',
],
'medium' => [
'label' => 'Moyenne',
'classes' => 'bg-amber-50 text-amber-700 ring-amber-600/20',
'dot' => 'bg-amber-500',
],
'low' => [
'label' => 'Basse',
'classes' => 'bg-slate-100 text-slate-600 ring-slate-500/20',
'dot' => 'bg-slate-400',
],
];
$priorityValue = strtolower((string) ($priority ?? 'low'));
$config = $priorityConfig[$priorityValue] ?? [
    'label' => ucfirst($priorityValue ?: 'Non définie'),
    'classes' => 'bg-slate-100 text-slate-600 ring-slate-500/20',
    'dot' => 'bg-slate-400',
];
@endphp
<span class="inline-flex items-center gap-2 whitespace-nowrap rounded-full px-3 py-1.5 text-xs font-semibold ring-1 ring-inset {{ $config['classes'] }}">
    <span class="h-1.5 w-1.5 rounded-full {{ $config['dot'] }}"></span>
    {{ $config['label'] }}
</span>