var tempStartWidth = $('#treeContainer').width() + 30;
$(document).ready(function () {
  console.log("asss", treeJSON);
  
  

  function traverseDeepFirst_FindPersonChildren(personId, flag, callback) {
    var children = (function recursive(currentNode) {
      var i = 0;//, max_i = currentNode.children.length;
		if(flag){
			if( ( typeof currentNode.children === 'undefined' ) ||
					(
					  typeof currentNode.children !== 'undefined' &&
					  Object.keys( currentNode.children ).length > 0
					)
				  ) {
				  var childrenArray = [],
					  j;

				  for( j in currentNode.children ) {
					childrenArray.push( currentNode.children[j] );
				  }

				  return childrenArray;
				}
				else return null;
		}else{
			for( i in currentNode.children ) {
			if( currentNode.children.hasOwnProperty(i) ) {
			  if( currentNode.children[i].id !== personId ) {
				recursive( currentNode.children[i] );
			  }
			  else {
				if( ( typeof currentNode.children[i].children === 'undefined' ) ||
					(
					  typeof currentNode.children[i].children !== 'undefined' &&
					  Object.keys( currentNode.children[i].children ).length > 0
					)
				  ) {
				  var childrenArray = [],
					  j;

				  for( j in currentNode.children[i].children ) {
					childrenArray.push( currentNode.children[i].children[j] );
				  }

				  return childrenArray;
				}
				else return null;
			  }
			}
		  }
		}
		  
    }(treeJSON[0]));

    if( typeof callback === 'function' ) callback(children);
  }
  
  function _childrenFragment(children,treeLevel,parent, flag) {
    // prepare new level container
    var fragment = document.createDocumentFragment(),
        container = document.createElement('ul'),
        i = 0, max_i = children.length;
    var invitePersonMarkup = '<div class="clearfix normalizeTreeNode"><div class="person"><div id="head-person" class="boxOut-person"><div class="col-md-12 col-sm-12 col-xs-12 boxOut-treeTop"><div class="col-md-12 col-sm-12 col-xs-12 boxOut-treeName font-RobotoCondensed">None</div><div class="col-md-12 col-sm-12 col-xs-12 boxOut-treeId font-RobotoCondensed"></div></div><div class="col-md-12 col-sm-12 col-xs-12 boxOut-treeFoto boxOut-treeFoto-blank"><a href="#" class="col-md-12 col-sm-12 col-xs-12"><div class="col-md-12 col-sm-12 col-xs-12 box-treeFoto"  style="background-image: url(\'../../img/icon/genology-blank.png\');"></div></a></div><div class="boxOut-treeCount font-RobotoCondensed-Bold">0</div><div class="col-md-12 col-sm-12 col-xs-12 boxOut-treeBottom"><div class="row"><div class="col-md-12 col-sm-12 col-xs-12 boxOut-buttonInvite"><button type="button" class="btn button-invite font-RobotoCondensed-Bold">INVITE</button></div></div></div></div></div></div>';

    // START Edit
    container.id = 'treeLevel-' + treeLevel;
    if(children.length == 0) container.className = 'singleBox';
    // END Edit

    for( i; i < max_i; i += 1 ) {
      container.appendChild( document.createElement('li') );

      var item = container.children[i];
      item.appendChild( document.createElement('div') );
      // Create normalizeTreeNode
      var person = item.children[0];
      person.className = 'clearfix normalizeTreeNode';
      person.appendChild( document.createElement('div') );
      // Create boxOut-person
      var boxPerson = person.children[0];
      boxPerson.className = 'boxOut-person';
      boxPerson.appendChild( document.createElement('div') ); // 1st child, treeTop
      boxPerson.appendChild( document.createElement('div') ); // 2nd child, treeFoto
      boxPerson.appendChild( document.createElement('div') ); // 3rd child, treeCount
      boxPerson.appendChild( document.createElement('div') ); // 4th child, treeBottom
      // Create boxOut-treeTop
      var boxTop = boxPerson.children[0],
          boxTopPersonName, boxTopPersonId;
      boxTop.className = 'col-md-12 col-sm-12 col-xs-12 boxOut-treeTop';
      boxTopPersonName = boxTop.appendChild( document.createElement('div') );
      boxTopPersonName.className = 'col-md-12 col-sm-12 col-xs-12 boxOut-treeName font-RobotoCondensed';
      boxTopPersonName.innerHTML = children[i].name;
      boxTopPersonId = boxTop.appendChild( document.createElement('div') );
      boxTopPersonId.className = 'col-md-12 col-sm-12 col-xs-12 boxOut-treeId font-RobotoCondensed';
      boxTopPersonId.innerHTML = children[i].id;
      // Create boxOut-treeFoto
      var boxPhoto = boxPerson.children[1],
          boxPhotoAnchor, boxPhotoImage;
      boxPhoto.className = 'col-md-12 col-sm-12 col-xs-12 boxOut-treeFoto';
      boxPhotoAnchor = boxPhoto.appendChild( document.createElement('a') );
      boxPhotoAnchor.className = 'col-md-12 col-sm-12 col-xs-12';
      boxPhotoAnchor.href = '#';
      boxPhotoAnchor.dataset.personId = children[i].id;
      boxPhotoImage = boxPhotoAnchor.appendChild( document.createElement('div') );
      boxPhotoImage.className = 'col-md-12 col-sm-12 col-xs-12 box-treeFoto';
      boxPhotoImage.style.backgroundImage = "url('../../img/genealogyPerson/"+ children[i].photo +"')";
      // Create boxOut-treeCount
      var boxCount = boxPerson.children[2];
      boxCount.className = 'boxOut-treeCount font-RobotoCondensed-Bold';
      boxCount.innerHTML = (function() {
        if( typeof children[i].children !== 'undefined' && Object.keys(children[i].children).length > 0 ) {
          return String( Object.keys(children[i].children).length );
        }
        else return '0';
      }());
      // Create boxOut-treeBottom
      boxBottom = boxPerson.children[3];
      boxBottom.className = 'col-md-12 col-sm-12 col-xs-12 boxOut-treeBottom';
      boxBottom.style.display = 'none';
      boxBottom.appendChild( document.createElement('div') ).className = 'row'; // 1st child, registration label
      boxBottom.appendChild( document.createElement('div') ).className = 'row'; // 2nd child, registration value
      boxBottom.appendChild( document.createElement('div') ).className = 'row'; // 3rd child, invitations label
      boxBottom.appendChild( document.createElement('div') ).className = 'row'; // 4th child, invitations value
      // Create person details
      var j = 0, max_j = boxBottom.children.length;
      for( j; j < max_j; j += 1 ) {
        var detail = boxBottom.children[j].appendChild( document.createElement('div') );

        if( j === 0 || j === 2 ) {
          detail.className = 'col-md-12 col-sm-12 col-xs-12 boxOut-treeBottomTitle font-RobotoCondensed';
          detail.innerText = ( j === 0 ) ? 'Register Date :' : 'Available Invitation :';
        }
        else if( j === 1 || j === 3 ) {
          detail.className = 'col-md-12 col-sm-12 col-xs-12 boxOut-treeBottomDate font-RobotoCondensed-Bold';
          detail.innerText = ( j === 1 ) ? children[i].register : children[i].invitations;
        }
      }
    }
    // Create invite person for last children in each container
    if(children.length < 7 && !flag){
      var invitation = container.appendChild( document.createElement('li') );      
      invitation.innerHTML = invitePersonMarkup;
    }

    fragment.appendChild(container);

    return fragment;
  };
  
  // handle hover for all dynamic nodes

  $('#hv-tree').on('mouseenter', '.boxOut-person', function(event) {
    $(this).children(".boxOut-treeBottom").slideToggle("fast");
  }).on('mouseleave', '.boxOut-person', function(event) {
    $(this).children(".boxOut-treeBottom").slideToggle("fast");
  });
  
  // handle click for all dynamic nodes
  $('#hv-tree').on('click', '.boxOut-treeFoto > a', function(event) {
    var treeLevel = 0;
    if( $(this).parents('.tree-level-container').attr('id') != undefined ){
      var treeLevelId = $(this).parents('.tree-level-container').attr('id');
      var treeLevelTemp = treeLevelId.split("-");
      treeLevel = treeLevelTemp[1];
      treeLevel++;
    }
    event.preventDefault();
    event.stopPropagation();
    
    if( $(this).parent().hasClass('boxOut-treeFoto-blank') || $(this).parent('.person').hasClass('boxOut-treeFoto-blank') || $(this).parents('.hv-item-child').hasClass('root') ) {
      // Don't expand the children tree if the clicked element is invitation box
      // or root parent
      return;
    }
    else {
        var boxWidth = 149;
        if( !$(this).parents('.clearfix.normalizeTreeNode').hasClass('expandedBranch') ) {
			var paddingWidth = 30;
			var containerWidth = $('#treeContainer').width() + paddingWidth;
			console.log("hasil", $(this).data('index'));
        var nodeIndex = parseInt( $(this).data('index') ),
            nodeParentIndex = parseInt( $(this).data('parent-index') ),
            nodePersonId = $(this).data('person-id'),
            $context = $(this);

        if( $(this).parents('.hv-item-child').siblings().find('.person.expanded').length > 0 ) {
//          START Edit
//          $(this).parents('.hv-item-child').siblings().find('.person.expanded').removeClass('expanded')
//          $(this).parents('.tree-level-container').nextAll('.tree-level-container').remove();
        }
		var headdd = $(this).parent().parent().attr('id') === 'head-person' ? true : false;
        traverseDeepFirst_FindPersonChildren(nodePersonId, $(this).parent().parent().attr('id') === 'head-person' ? true : false, function(childrenArray) {
          if( childrenArray === null || typeof childrenArray === 'undefined' ) {
            // Create dummy array with an empty element if
            // childrenArray value is null, so _childrenFragment function
            // could running to create the invitation box only.
            childrenArray = [];
          }
          // Render the new tree
          $context.parents('.clearfix.normalizeTreeNode').addClass('expandedBranch');

          // START EDIT
          // adding new element
          var parent = $context.parents('.normalizeTreeNode').next();
          var fragment = _childrenFragment( childrenArray , treeLevel , parent , headdd);

          $context.parents('.boxOut-person').parent().parent().append( fragment );
          // width adjustment
          var tempWidth = $context.parents('.normalizeTreeNode').width();
          
          var additionalWidth = tempWidth;
          

          if(childrenArray.length > 1) paddingWidth *= childrenArray.length;
          else additionalWidth = 0;
		  
		  
		  if(headdd){
			  var newWidth = tempStartWidth;
		  }else{
			  var newWidth = containerWidth + (((additionalWidth + paddingWidth) * childrenArray.length)+150);
		  }
          
//alert( additionalWidth + paddingWidth);          
          $('#treeContainer').css("width", newWidth);
          
          // END EDIT
        });
      }
      else {
		$context = $(this);
        var paddingWidth = 30;
        var additionalWidth = $context.parents('.normalizeTreeNode').width();
        var containerWidth = $('#treeContainer').width()+paddingWidth;
		
        // adjust padding
        var nodePersonId = $(this).data('person-id');
        traverseDeepFirst_FindPersonChildren(nodePersonId, false, function(childrenArray) {
          if( childrenArray === null || typeof childrenArray === 'undefined' ) {
            // Create dummy array with an empty element if
            // childrenArray value is null, so _childrenFragment function
            // could running to create the invitation box only.
            childrenArray = [];
          }

          if(childrenArray.length > 1) paddingWidth *= childrenArray.length;
          else additionalWidth = 0;

          var newWidth = (containerWidth - (((additionalWidth + paddingWidth) * childrenArray.length)+150));
//alert((additionalWidth + paddingWidth));
          $('#treeContainer').css("width", newWidth);
          
        });

        //Remove box
        $(this).parents('.boxOut-person').parent().next().remove();
        $(this).parents('.boxOut-person').parent().removeClass('expandedBranch');

      }
    }
  });

  // handle click for tree zooming button
  $('.boxOut-content').on('click', 'button.btn', function(event) {
    event.stopPropagation();

    var currentZoomScale = parseFloat( $('#hv-tree').data('zoom-scale') ),
        newZoomScale = 0;

    if( $(this).hasClass('button-maximize') ) {
      var scaleIncrement = parseFloat( $(this).data('zoom-increment') );
      newZoomScale = currentZoomScale + scaleIncrement;
    }
    else if( $(this).hasClass('button-minimize') && currentZoomScale > 0.15) {
      var scaleDecrement = parseFloat( $(this).data('zoom-decrement') );
      newZoomScale = currentZoomScale - scaleDecrement;
    }
    else return;

    $('#hv-tree').css( 'transform', 'scale('+ newZoomScale +', '+ newZoomScale +')' );
    $('#hv-tree').data('zoom-scale', String( newZoomScale ) );
  });
});