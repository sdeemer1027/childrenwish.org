@extends('layouts.app')

@section('content')

<style>
    /* Custom styles for the carousel */
    #carouselExampleSlidesOnly {
        max-height: 500px; /* Limit the maximum height */
        overflow: hidden; /* Hide overflow content */
    }

    .carousel-inner .carousel-item img {
        max-height: 500px; /* Limit image height */
        object-fit: cover; /* Ensure the image covers the entire carousel item */
}
.mission-bg {
    background-color: #15e5c6; /* Green color */

    }
</style>
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/images/child-2443969_1280.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/images/hands-2274254_1280.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/images/pexels-photo-1001914.webp" class="d-block w-100" alt="...">
    </div>
  </div>
</div>

<div class="container">


    <div class="row justify-content-center">
<div class="col-md-10">
            <div class="card">
                <div class="card-header mission-bg"><h3>Our Mission</h3></div>

                <div class="card-body">
                    At childrenwish.org, our mission is to bring joy and hope to the lives of children facing challenging circumstances. From foster children to those battling terminal illnesses, we believe that every child deserves a chance to dream and experience moments of happiness. Through your generosity and support, we aim to fulfill their wishes, creating lasting memories and spreading love and positivity. Join us in making a difference in the lives of these extraordinary children
                </div>
            </div>
        </div>
</div>

<BR>





    <div class="row justify-content-center">


{{-- 
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Embracing Hope: The Journey of a Terminally Ill Child</div>

                <div class="card-body">



<li>The Child's Story</li>
<li>Family Dynamics</li>
<li>Medical Journey</li>
<li>Emotional Rollercoaster</li>
<li>Quality of Life</li>
<li>Support Networks</li>
<li>Finding Meaning and Hope</li>
<li>End-of-Life Care</li>
<li>Legacy and Impact</li>





                    {{--

                    Introduction

Setting the stage by introducing the topic of childhood terminal illness.
Emphasizing the importance of understanding and supporting children facing such challenges.

The Child's Story

Introduce a specific child or share a composite story representing the experiences of many.
Describe their diagnosis, treatments, and the impact on their daily life.

Family Dynamics

Explore how terminal illness affects the child's family members.
Discuss the emotional struggles, coping mechanisms, and support systems in place.

Medical Journey

Detail the medical procedures, treatments, and healthcare challenges the child faces.
Highlight the role of medical professionals and caregivers in providing care and comfort.

Emotional Rollercoaster

Discuss the emotional highs and lows experienced by the child and their family.
Address feelings of fear, sadness, hope, and resilience.

Quality of Life

Explore how the illness impacts the child's quality of life, including social interactions, education, and daily activities.
Discuss efforts to enhance the child's comfort and well-being.

Support Networks

Highlight the importance of support networks, including medical teams, family, friends, and community organizations.
Discuss initiatives that provide emotional, financial, and practical support to families of terminally ill children.

Finding Meaning and Hope

Discuss how families and children find meaning, joy, and hope amidst challenging circumstances.
Share stories of resilience, courage, and moments of happiness.

End-of-Life Care

Address the sensitive topic of end-of-life care and decision-making.
Discuss palliative care, hospice services, and the importance of compassionate end-of-life support.

Legacy and Impact

Explore ways in which terminally ill children leave a lasting impact on their families and communities.
Discuss how their stories inspire advocacy, research, and improvements in pediatric healthcare.

Conclusion

Summarize the journey of a terminally ill child, highlighting their courage and the support systems that surround them.
Emphasize the importance of empathy, understanding, and ongoing support for children and families facing terminal illnesses.

-- }} 
                </div>
            </div>
        </div>
  --}}     
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Count</div>

                <div class="card-body">
                  Donors : {{ $donorCount }} <BR>
                  Guardians : {{ $guardianCount }}<BR>
                  Children : {{ $childCount }} <BR>
                  WISHES :  {{ $wishCount }}<BR>
                  Wishes Filled : {{ $wishFilledCount }}<br>

                  <BR><BR>

                         </div>
            </div>
        </div>

 <div class="col-md-8">
            <div class="card">
                <div class="card-header">Navigating the Challenges Faced by Foster Children</div>

                <div class="card-body">
<li>The Foster Care Journey</li>
<li>Emotional Turmoil</li>
<li>Disrupted Education</li>
<li>Social and Behavioral Dynamics</li>
<li>Healthcare and Mental Wellness</li>
<li>Transitioning to Adulthood</li>
<li>Permanency and Stability</li>
<li>Support Networks</li>
{{-- 

                   <h5>Introduction</h5>
<li>Brief overview of foster care and its role in providing temporary homes for children.</li>
<li>Importance of understanding the unique challenges foster children encounter.</li>

<h5>The Foster Care Journey</h5>

<li>Exploring the experiences of children entering and transitioning through the foster care system.</li>
<li>Challenges during placement transitions and adjusting to new environments.</li>

<h5>Emotional Turmoil</h5>

<li>Addressing the emotional impact of separation from biological families.</li>
<li>Feelings of abandonment, loss, and uncertainty among foster children.</li>

<h5>Disrupted Education</h5>

<li>Challenges in maintaining educational continuity and addressing academic gaps.</li>
<li>Impact of school changes and support systems needed for academic success.</li>

<h5>Social and Behavioral Dynamics</h5>

<li>Exploring social integration challenges, forming relationships, and trust issues.</li>
<li>Behavioral challenges stemming from trauma and instability.</li>

<h5>Healthcare and Mental Wellness</h5>

<li>Access barriers to healthcare services and the importance of consistent medical care.</li>
<li>Mental health support and resources for foster children.</li>

<h5>Transitioning to Adulthood</h5>

<li>Challenges faced by foster youth as they approach adulthood.</li>
<li>Emphasizing the difficulties when a child reaches 18 and finds themselves without a support system.</li>

<h5>Permanency and Stability</h5>

<li>Importance of stable, permanent homes for foster children.</li>
<li>Discussion on reunification, adoption, and long-term care options.</li>

<h5>Support Networks</h5>

<li>Role of supportive foster families, social workers, and community resources.</li>
<li>Initiatives and organizations providing assistance to foster children and youth aging out of the system.</li>

<h5>Conclusion</h5>

<li>Summarizing the multifaceted challenges faced by foster children and youth.</li>
<li>Advocating for continued support, awareness, and policy changes to improve outcomes for foster children, especially during critical transitions like aging out of the system.</li>
      
--}}
                </div>
            </div>
        </div>


    </div>
<BR>
  <div class="row justify-content-center">
     <div class="col-md-12">
        <div class="card">
        <div class="card-header mission-bg"><h4>Sofia</h4></div>
        <div class="card-body">


{{--
            Sofia's Story was a dream that was shattered becuase of illness and changes<BR>
            <p>
            The year was 1998, Sofia was a Russian child 4 years of age when Dr.Steve first found her. She was in an orphanage in Russia when he first seen her. He instantly wrote to the orphanage and 
            started the journey of getting to know her and show the desires to adopt her and bring her the USA where he would raise her and give her every chance to become more then her dreams could imagine. 
            </p><p>
            a group if nuns whom care she was in had answered the letters and welcomed him into the new world of bringing not only peace between the miles of diffence but to show a child care is only a dream away.
            the journey is not a easy road but then nothing worth it will is not easy or everyone would have it and it would be worth less then first tought :) ....
            </p><p>
            Back in the OLD days, before the Y2K, times were a bit different. Yet the path of finding a child in need to adoption to exploring life has begun for Steve and his family. 
            <BR>     
            He had begun writting emails to this child and the Nuns would read them to her then she would reply in her native tougne and they would simply translate and write her responce back to him. <BR>
            The relationship between them has begun and started off in a great new adventure ... Soon she began telling him of her every day fun and introduce him to her closest friends whom she slept with, played all day and ate meals with. They all wanted to meet someone like him who just cared how she felt and f she was happy. 
        </p><p>
            After some time has passed he felt more comfortable and showed even more desires to adopt this child and bring her to her new home with hope. <BR>He started by holding a blanket drive. This is where he started, any blanket new or old was needed as it was starting to get cold in Russia as the winter nights were getting closer. he soon raised many new blankets and clothes for the children of all ages and needs in the orphanage. He then boxed up the items and shipped them to them to arrive about a week and half later. That is when all the children started to smile at the greatness of one heart. With Christmas about 3 weeks away he wanted to send her the few special gifts his heart wanted to share. Soon he felt guilty on how the other children would feel and treat her, so before he shipped out any toys - tooth brush - candy. he desided to invite others to share a toy or two for the other children too. The responce was overwhelming and soon money started to come in to help pay the shipping too. 
        </p><p> 
            That Christmas was not just GREAT for all the children but super fantastic for all those who knew they made a diffence.<BR>The time has come to deside how to adopt so many miles away. The nuns had explained because of another country the adoption was not a fast sign here and have a good day type of path. But one Adult from the family must come visit and stay in the country for a few months while they learn more about each other and the child can learn more about them befire the Child can deside what they want in life. So he began to accept that and start his paper work where he has desided to take a few months off of life to go and visit in the hope when he returns he can bring home a new family member. 
        </p><p>It was about 2 weeks later when he received a new letter Directly from the nuns outlineing traggic news. It had seemed that Sofia had come down with Pneumonia.</p><p>
        Now due to the Country and politics around them not to mention the healthcare for the children. The nuns explained a heart shattering story. Because of her condition she was admitted into a hospital for no less then 8 weeks of care and because they were an ophanage a bed could not go empty for so long. The bed would be occupide by another child in need soon and Sofia's outcome woudl result in the next 8 weeks of care at a hospital, once she would be well enough to leave the only choice would be by the government to find her a new ophanage and bed. Because of the strong bond between them it was only logical that the nuns tell him to stop sending gifts to her as they would not be able to deliver to her as they would not know of where she will be. </p><p>
        This was a shock to him as his plans have all changed from helping and adopting to loss of any hope. The child found her way in his heart and soon left after 6 months of time. The dream was taking 
        due to an illness and the best intentions of care for the child.</p><p>As the years have past the childs smile never left his mind. He could only hope that she would grow to be a healthy and successfull adult. each year past and each year the memories grew stronger as they never left his heart. Many, many, many, years later have past and the memories of how he help every child in reach in her circle stay warm those cold nights never left his thoughts. </p><p>Soon on his programming path he was introduced to a helpful group of ladies whom Foster children and share the hope to fill the dreams of everyone of the children in foster care. They shared the stories of how musch of a challenge it is for each child to just have a dream as they do not know how to dream when they have so many needs in life the simple gift of a box of crayons was never even a question in the dream world for these children. he help build out the platform and started to show a difference. Soon later in life this dream of his to help all the children simply dream and fill a special peace in thier soul and heart was becoming too much .... </p><p>
        He then Started ChildrensWish.org where he can control hos the funds were brought in and how they cna fill the hopes of every foster child whom can simply have a desire and dream...    


            </p>

--}}











<p>
Sofia's Story began as a dream, but it was shattered by illness and unforeseen changes. In 1998, Sofia, a four-year-old Russian child, caught the attention of Dr. Steve while she was in an orphanage in Russia. Dr. Steve was instantly drawn to her and initiated the process of getting to know her with the intention of adopting her and bringing her to the USA, where he could provide her with opportunities beyond her wildest dreams.
</p><p>
The nuns caring for Sofia at the orphanage responded to Dr. Steve's letters, welcoming him into the world of bridging distances and showing that care is always within reach. Though the journey was challenging, it was worth every difficulty, as true value often comes from overcoming obstacles.
</p><p>
In those pre-Y2K days, the journey of finding a child in need, initiating adoption proceedings, and embracing a new life had begun for Dr. Steve and his family. He communicated with Sofia via emails, which the nuns would read to her, and she would respond in her native language. This exchange marked the beginning of a beautiful relationship and a grand adventure.
</p><p>
Over time, Dr. Steve expressed a stronger desire to adopt Sofia and bring her home. He started by organizing a blanket drive to help the children in the orphanage stay warm during the approaching winter. The response was heartwarming, with many contributing blankets, clothes, toys, and even funds for shipping.
</p><p>
That Christmas became a memorable one, not just for Sofia but for all the children touched by Dr. Steve's kindness. However, the path to adoption was not straightforward due to international regulations. One adult from Dr. Steve's family had to visit and stay in Russia for a few months to facilitate the adoption process.
</p><p>
Unfortunately, tragedy struck when Sofia fell ill with pneumonia. Despite efforts to provide her with medical care, the limitations of the system and politics surrounding healthcare for orphans in Russia presented insurmountable challenges. The nuns delivered the devastating news that Sofia's condition required long-term hospitalization, jeopardizing her place in the orphanage.
</p><p>
The dream of adopting Sofia was shattered, not due to lack of love or effort, but because of circumstances beyond control. Dr. Steve's plans had changed from hopeful adoption to a painful loss of hope. Sofia had left a lasting impact on his heart, and her memory remained strong even as the years went by.
</p><p>
Driven by his experiences and a desire to make a difference, Dr. Steve eventually founded ChildrensWish.org. This platform aimed to bring hope and fulfill the dreams of foster children, who often struggle to dream amidst life's challenges. Through ChildrensWish.org, Dr. Steve sought to empower every foster child to dream and find solace in their aspirations.
</p>
<p>Will you, Can you, Help support his mission in changing a childs dream into a smile?    </p>


        </div>
     </div>
  </div>
</div>




    </div>
</div>
@endsection
