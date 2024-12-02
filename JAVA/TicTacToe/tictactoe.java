import java.util.Scanner;

class tictactoe
{
    public static void main(String[] args) {
        char[][] board = new char[3][3];
        Scanner scanner = new Scanner(System.in);

        for (int row = 0; row < board.length; row++) {
            for (int col = 0; col < board[row].length; col++) {
                board[row][col] = ' ';
            }
        }

        System.out.println("Enter First Player Name :");
        String player1 = scanner.nextLine();
        System.out.println("Enter Second Player Name :");
        String player2 = scanner.nextLine(); 

        char player = 'X';
        boolean gameover = false; 
       


        while (!gameover) {
            printBoard(board);
            if(isFull(board))
            {
                if(player == 'X')
                {
                    System.out.println("Player " + player1 + " Enter The Place(1 to 9): ");
                }
                else
                {
                    System.out.println("Player " + player2 + " Enter  The Place(1 to 9): ");
                }
            }
            else
            {
                System.out.println("................The Match Is Drow................");
            }
            
            int place = scanner.nextInt();
            int row = 0;
            int col = 0;
            if(place > 9)
            {
                System.out.println("Enter Valid Place!!!!!");
            }
            if(place == 1 || place == 4 ||place == 7)
            {
                row = (place == 1) ? 0 : (place == 4) ? 1 : 2;
                col = 0;
            }
            if(place == 2 || place == 5 ||place == 8)
            {
                row = (place == 2) ? 0 : (place == 5) ? 1 : 2;
                col = 1;
            }
            if(place == 3 || place == 6 ||place == 9)
            {
                row = (place == 3) ? 0 : (place == 6) ? 1 : 2;
                col = 2;
            }
            // int row = scanner.nextInt();
            // int col = scanner.nextInt();
    
            if(board[row][col] == ' ')
            {
                board[row][col] = player;
                gameover = havewon(board,player);
                if(gameover)
                {
                    if(player == 'X')
                    {
                        System.out.println("................Player "+player1+" win................");
                        printBoard(board);
                    }
                    else
                    {
                        System.out.println("................Player "+player2+" Win................");
                        printBoard(board);

                    }
                   
                }
                else
                {
                    player = (player == 'X') ? 'O':'X';
                }
            }
           
            else
            {
                System.out.println("................Please Select valid Number(1 to 9)................");
                System.out.println();
            }
        }
    }

    private static boolean isFull(char[][] board) {
        
        for (int i = 0; i < board.length; i++) {
            for (int j = 0; j < board.length; j++) {
                if (board[i][j] == ' ') {
                    return true;
                }
            }
        }
        return false;
    }

    private static boolean havewon(char[][] board, char player) {

        //check for Row
        for (int row = 0; row < board.length; row++) {
            if(board[row][0] == player && board[row][1] == player && board[row][2] == player)
            {
                return true;
            }
        }

        //check for col
        for (int col = 0; col < board.length; col++) {
            if(board[0][col] == player && board[1][col] == player && board[2][col] == player)
            {
                return true;
            }
        }
        //for digonal
        if(board[0][0] == player && board[1][1] == player && board[2][2] == player)
        {
            return true;
        }
        if(board[0][2] == player && board[1][1] == player && board[2][0] == player)
        {
            return true;
        }
        return false;

    }

    private static void printBoard(char[][] board) {
        for (int row = 0; row < board.length; row++) {
            System.out.print("| ");

            for (int col = 0; col < board[row].length; col++) {
            System.out.print(board[row][col] + " | ");
            }
            System.out.println();
        }
    }
}