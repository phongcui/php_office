$(document).ready(function () {
    $('#cancel-button').click(function () {
        window.location = 'index.php';
    });

    $('#btn-clear-search').click(function () {
        window.location = 'index.php';
    });

    $('#multy-delete').click(function () {
        $('#main-form').submit();
    });

    $('#check-all').change(function () {
        var checkStatus = this.checked;
        $('#main-form')
            .find(':checkbox')
            .each(function () {
                this.checked = checkStatus;
            });
    });

    $('#filter-form [name="status"]').change(function () {
        $('#filter-form').submit();
    });

    $('.success, .notice, .error').click(function () {
        $(this).toggle('slow');
    });
});
