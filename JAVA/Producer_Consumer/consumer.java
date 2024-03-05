public class consumer extends Thread {

    compnay c;

    consumer(compnay c)
    {
        this.c = c;
    }

    public void run()
    {
        while (true) 
        {
            this.c.consume_item();
            try{
                Thread.sleep(2000);
            }
            catch(Exception e){}
        }
    }
    
}
