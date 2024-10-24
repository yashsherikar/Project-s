package chatbot;

import java.util.Random;
import java.util.Scanner;
import chatmarathi.*;

public class chatbot
{
    public static void chat(String ChatStr)
    {
        // String Smiling = "\uD83D\uDE80";
        Random random = new Random();
        Scanner sc  = new Scanner(System.in);
        
        if(ChatStr.equals("hello") || ChatStr.equals("hey") || ChatStr.equals("hi"))
        {
            
            String[] Replays = {"Hey!What's up?","Hey! How Are You?","Hey, how's it going?","Hey! It's great to see you here.","Hello! Dear","Hello! How Are You?"};         
            System.out.println(Replays[random.nextInt(Replays.length)]);
        }
        else if(ChatStr.equals("i am fine") || ChatStr.equals("i am good") || ChatStr.equals("i am great") || ChatStr.equals("great") || ChatStr.equals("good")|| ChatStr.equals("fine"))
        {
            String []Replays = {"Good to hear!","Great!"};
            System.out.println(Replays[random.nextInt(Replays.length)]);
        }
        else if(ChatStr.equals("how are you?") || (ChatStr.equals("how are you")))
        {
            String []Replays = {"I Am Good","I am Fine! What About You?"};
            System.out.println(Replays[random.nextInt(Replays.length)]);
        }
        else if(ChatStr.equals("not good") || ChatStr.equals("boring"))
        {
            String []Replays = {"Ooh! Can i Tell You joke if Yes Please Say's joke"};
            System.out.println(Replays[random.nextInt(Replays.length)]);
        }
        
        else if(ChatStr.equals("i love you"))
        {
            String[] Replays = {"Ahuuuuu.. Love You More","Love You Forever","I Love You tooo! You're Such A Great Friend!","Awww,That's Really Sweet Of you To Sat! I Appreciate your Kind Words!","I Love You Tooo! You're Such A Special Friend To Me!","I Love You Too! You're The Best"};
            System.out.println(Replays[random.nextInt(Replays.length)]);
        }
        else if(ChatStr.equals("i hate you"))
        {
            String[] Replays = {"I'm Sorry If I've Done Somthing To Upset You. Is There Somthing I Can Do To Make It Better?"};
            System.out.println(Replays[random.nextInt(Replays.length)]);
        }
       
        else if(ChatStr.equals("tell me a joke") || ChatStr.equals("tell a joke") || ChatStr.equals("tell me joke ") || ChatStr.equals("joke") || ChatStr.equals("one more"))
        {
            int TellmeJoke = 0;
    
            System.out.println();
            String []Replays = {"Why don't some couples go to the gym? \nBecause some relationships don't work out.","Great!","How do robots eat dips? \nWith micro chips","Who is the oldest animal in jungle Zebra? \nBecause it has black and white","Why can't bicycle stan on its own? \nBecause It's teo tired"};
            System.out.println(Replays[random.nextInt(Replays.length)]);

            TellmeJoke++;

            if(TellmeJoke >=5 )
            {
                System.out.println();
                String[] Replays1 = {"Tell Me Jock I Love To Listen!","Do You Have Joke Please Can You Tell Me Joke"};         
                System.out.println(Replays[random.nextInt(Replays1.length)]);
                String ReacStr  =sc.nextLine();

                if(ReacStr.equals(ReacStr))
                {
                    System.out.println();
                    String[] Replays2 = {"You'r Joke Are Funney","Hahahaha It's Good One","It's Ok Ok","You Are Funny"};         
                    System.out.println(Replays[random.nextInt(Replays2.length)]);
                }
            }

            
        }
        else if(ChatStr.equals("which language you speak") || ChatStr.equals("how many language do yo know"))
        {
            System.out.println("Englis And Marathi");
            String LangStri = sc.nextLine();
            if(LangStri.equals("ok"))
            {
            }
            else if(LangStri.equals("can you speak marathi") || (LangStri.equals("please speak marathi") || (ChatStr.equals("speak marathi"))))
            {
                System.out.println("Ho Me Marathi Bolu Shkte");
                System.out.print("Eva Assistance-> ");
                String MStr = sc.nextLine();
                marathi.marathichat(MStr);
            }

        }
        else if(ChatStr.equals("can you speak marathi") || (ChatStr.equals("please speak marathi") || (ChatStr.equals("speak marathi"))))
        {
            System.out.println("Ho Me Marathi Bolu Shkte");
            System.out.print("Eva Assistance-> ");
            String MStr = sc.nextLine();
            marathi.marathichat(MStr);
        }
        else if(ChatStr.equals("by") || ChatStr.equals("exit"))
        {
            System.exit(0);
        }
        
       
        
       
    }
}
