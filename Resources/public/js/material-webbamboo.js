$(function() {
    $('.ct-chart').each(function() {
        if(typeof $(this).data("chartid") !== 'undefined' )
        {
            var id = $(this).attr("id");
            var type = $(this).data("type");

            console.log(id);
            var chartData = window[id + 'Data'];
            var chartOptions = window[id + 'Options'];

            chartOptions.lineSmooth = Chartist.Interpolation.cardinal({
                tension: 0
            });

            var chart = type == 'line' ? new Chartist.Line('#'+id, chartData, chartOptions) : new Chartist.Bar('#'+id, chartData, chartOptions);
        }
    });
});