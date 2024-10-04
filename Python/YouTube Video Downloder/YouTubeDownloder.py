from pytube import YouTube

link = input("Enter Your Link :")

youtube_1 = YouTube(link)

# print(youtube_1.title)

videos = youtube_1.streams.all()
vid = list(enumerate(videos))

for i in vid:
    print(i)

print()

strm = int(input("enter : "))
videos[strm].download()

print("Download succesfully......")
