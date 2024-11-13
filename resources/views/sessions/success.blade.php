@if (session('success'))
<div id="success-message" class="p-5 mb-4 text-sm text-teal-700 bg-green-100 rounded-lg" role="alert">
    {{ session('success') }}
</div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.transition = 'opacity 0.5s ease';
                successMessage.style.opacity = 0;
                setTimeout(() => {
                    successMessage.remove();
                }, 500);
            }, 2000);
        }
    });
</script>
