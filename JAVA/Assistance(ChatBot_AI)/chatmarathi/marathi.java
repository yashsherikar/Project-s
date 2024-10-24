package chatmarathi;

import java.util.Random;
import java.util.Scanner;


public class marathi
{
    public static void marathichat(String MarathiChatStr)
    {
        Random random = new Random();
        Scanner sc = new Scanner(System.in);

        if(MarathiChatStr.equals("kashi ahes"))
        {
            System.out.println();
            String[] Replays = {"Me mast! ani Tumhi kashe ahat?","Me chan ahe!Tumhi ashe ahat?"};         
            System.out.println(Replays[random.nextInt(Replays.length)]);
        }
        else if(MarathiChatStr.equals("me pan mast") || (MarathiChatStr.equals("me pn mast")))
        {
            System.out.println();
            String[] Replays = {"Khup Chan,Aikun Anand zala","Mastch"};         
            System.out.println(Replays[random.nextInt(Replays.length)]);
        }
        else if(MarathiChatStr.equals("me khup anandi ahe"))
        {
            System.out.println();
            String[] Replays = {"Khup Chan,Aikun Anand zala","Mastch","As Ky Zaly Mala Pan Sangal Ky","Mla Pan Sangal Ky? Mla Tumchya Anandat Shabhag Ghyacha Ahe"};         
            System.out.println(Replays[random.nextInt(Replays.length)]);

            System.out.println("");
            String ReacStr = sc.nextLine();

            if(ReacStr.equals(ReacStr))
            {
                System.out.println("Are Vha Khup Chan Vatal Aikun");
            }
        }
        else if(MarathiChatStr.equals("kasa ahes"))
        {
            System.out.println("Me Mulgi Ahe");
        }

        sc.close();
    }
    
}
