jQuery.fn.extend({
  rating: function(options){
    if(typeof(options)=='undefined') options={};
    var ratings=[];
    objs=this;
    if(objs.length){
      for(var i=0;i<objs.length;i++){
        ratings.push(new simpleRating(options,objs[i]));
      }
    }
  },
});

class simpleRating{
  constructor(options,obj) {
    this.obj=obj;
    this.options=options;
    this.rating=5;
    this.init();
  }

  init(){
    var html='<div class="simple-rating star-rating">';
    for(var i=0;i<5;i++){html+='<i class="fa fa-star" data-rating="'+(i+1)+'"></i>';}
    html+='</div>';
  
    $(this.obj)
      .attr('type','hidden')
      .after(html);

    $(this.obj).next().children().click({classObj:this},function(e){
      e.data.classObj.rate(this);
    });

    $(this.obj).next().children().mouseenter({classObj:this},function(e){
      e.data.classObj.setstars($(this).data('rating'));
    });

    $(this.obj).next().children().mouseleave({classObj:this},function(e){
      e.data.classObj.setstars(e.data.classObj.rating);
    });
  }

  rate(obj){
    var rating=$(obj).data('rating');
    $(obj).parent().prev().val(rating);
    this.rating=rating;
    this.refresh();
  }

  refresh(){
    this.setstars(this.rating);
  }

  setstars(rating){
    var stars=$(this.obj).next().children();
    for(var i=0;i<5;i++){
      var starObj=$(this.obj).next().children()[i];
      if(i<rating){
        $(starObj).addClass('fa-star');
        $(starObj).removeClass('fa-star-o');
      }else{
        $(starObj).removeClass('fa-star');
        $(starObj).addClass('fa-star-o');
      }
    }
  }
}