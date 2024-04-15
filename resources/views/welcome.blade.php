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

--}} 
                </div>
            </div>
        </div>
       
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

 <div class="col-md-4">
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
</div>
@endsection
