// JavaScript Document
window.onload = () => {
    Array.from( document.querySelectorAll( '.hs-section' ) ).forEach( ( hs_section ) => {
        
        let currentState = 'ready';
            

        const hs_scroll = hs_section.querySelector('.hs-scroll');
        const hs_items = hs_section.querySelectorAll('.hs-item');
        const hs_items_width = [];
        const hs_dots = hs_section.querySelectorAll( '.hs-dot' );
        let lastDot = 0;

        function calculateWidthFromTo( from, to ) {
            let width = 0
            Array.from( hs_items ).forEach( ( item, index ) => {
                if ( index < to && index >= from)
                    width += item.getBoundingClientRect().width;
            } );
            return width;
        }

        const activateDot = ( index ) => {
            hs_dots[lastDot].classList.remove('active');
            hs_dots[index].classList.add('active');
            lastDot = index;
        }
            

        window.addEventListener( 'wheel', function(e) {
            const leftScrollable = calculateWidthFromTo(0, hs_items.length - 1);

            function scroll () {
                let leftScroll = hs_scroll.scrollLeft - e.wheelDeltaY * .03;
                if ( leftScroll <= 0 ){
                    document.querySelector('body').style = "";
                    currentState = 'ready';
                    activateDot( 0 );
                    return;
                }
                if ( leftScroll > leftScrollable ){
                    document.querySelector('body').style = "";
                    currentState = 'done';
                    activateDot( hs_dots.length - 1 );
                    hs_scroll.scrollTo( { left: calculateWidthFromTo(0, lastDot) } );
                    return;
                }
                hs_scroll.scrollTo( {left: leftScroll} );
        
                if ( e.deltaY >= 0 ){
                    for ( let i = 0 ; i < hs_items.length ; i++ ) {
                        hs_scroll.scrollTo( {left: ++leftScroll} );
                        let index = i;
                        let to = index === hs_items.length - 1 ? hs_items.length - 1 : index + 1;
                        const left = hs_items_width[to];
                        if ( leftScroll <= left  ){
                            hs_scroll.scrollTo( { 
                                left,
                                behavior: 'smooth'
                            } );
                            activateDot( to );
                            break;
                        }
                    }
                }
                else if ( e.deltaY <= -1 ){
                    for ( let i = 0 ; i < hs_items.length ; i++ ){
                        hs_scroll.scrollTo( {left: --leftScroll} );
                        let index = i;
                        let offset = hs_items_width[index];
                        let to = index === 0 ? 0 : index - 1;
                        const left = hs_items_width[to];
                        if ( leftScroll < offset  ){
                            hs_scroll.scrollTo( { 
                                left,
                                behavior: 'smooth'
                            } );
                            activateDot( to );
                            break;
                        }
                    }
                }
                    
            }
                
            if ( hs_section.getBoundingClientRect().top >= window.innerHeight / 4  && hs_section.getBoundingClientRect().top <= window.innerHeight / 3  ){
                document.querySelector('body').style = "overflow: hidden";
                if ( currentState === 'ready' || currentState === 'run' ){
                    currentState = 'run';
                    scroll();
                }
                if ( currentState === 'done' || currentState === 'done-run' ) {
                    currentState = 'done-run';
                    scroll();
                }
            }else{
                document.querySelector('body').style = '';
                if ( hs_scroll.scrollLeft >= 10 ){
                    activateDot( lastDot );
                    hs_scroll.scrollTo( { left: calculateWidthFromTo(0, lastDot) } );
                }
                currentState = 'done';
            }
            
        } );

        Array.from( hs_dots ).forEach( (dot, index) => {
            dot.addEventListener( 'click', () => {
                let left = calculateWidthFromTo( 0, index );
                activateDot( index );
                hs_scroll.scroll({
                    left,
                    behavior: 'smooth'
                });
            } );
        } );
    
    
    } );
}