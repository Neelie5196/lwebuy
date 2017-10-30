function generateBarcode()
{
    $("barcode").update();
    var value = 'Hello World';
    var btype = 'code128';
    var renderer ='css';

    var settings = 
    {
      output:renderer,
      bgColor: '#FFFFFF',
      color: '#000000',
      barWidth: 2,
      barHeight: 100,
      addQuietZone: false
    };

    $("barcode").update().show().barcode(value, btype, settings);      
 }

$(function()
  {
    generateBarcode();
    }
 );