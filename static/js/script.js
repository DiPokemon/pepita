// function setEqualHeight(columns){
//     var tallestcolumn = 0;
//     columns.each(
//         function(){
//             currentHeight = $(this).height();
//             if(currentHeight > tallestcolumn){
//                 tallestcolumn = currentHeight;
//             }
//         }
//     );
//     columns.attr('style','height:' + tallestcolumn + 'px');
// }
// $(document).ready(function() {
//     setEqualHeight($(".portfolio_item img"));
// });

$(document).ready(function () {
    $('.header_burger').click(function (event) {
        $('.header_burger,.header_menu').toggleClass('active');
        $('body').toggleClass('lock')
    });
});