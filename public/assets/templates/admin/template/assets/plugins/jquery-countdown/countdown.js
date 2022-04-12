$(function() {
    var austDay = new Date("september 22, 2022");
    $('#launch_date').countdown({
        until: austDay,
        layout: '<ul class="countdown"><li><span class="number">{dn}<\/span><br/><span class="time">{dl}<\/span><\/li><li><span class="number">{hn}<\/span><br/><span class="time">{hl}<\/span><\/li><li><span class="number">{mn}<\/span><br/><span class="time">{ml}<\/span><\/li><li><span class="number">{sn}<\/span><br/><span class="time">{sl}<\/span><\/li><\/ul>'
    });
    $('#year').text(austDay.getFullYear());
});