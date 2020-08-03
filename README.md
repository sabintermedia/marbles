# marbles
 balls to bins app in laravel 7 with bootstrap 4
 


## Algorythm

- Set (N)umber
- Choose N unique colors
- Generate N Boxes
- Generate NxN balls so that every color is present
- For each ball in the stack, try to put it into a box
- check if there is room in box, if not, go to next box
- check if ball can be placed in the box depending on colors in the box <=2, if not, go to next box
- do this until all balls are distributed or infinite loop occurs