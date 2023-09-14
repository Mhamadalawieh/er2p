import React from 'react'
import classes from './Contactus.module.css'
import contactus from '../../assets/contactus.png'
import socials from '../../assets/contactsocials.png'

const Contactus = () => {
  return (
    <div className={classes.contactus_con}>
        <img src={contactus} alt='' />
        <div className={classes.content}>
            <div className={classes.form}>
                <div className={classes.formleft}>
                    <label>Name</label>
                    <input type='textbox' />
                    <label>Phone Number</label>
                    <input type='textbox' />
                    <label>E-mail</label>
                    <input type='textbox' />
                </div>
                <div className={classes.formright}>
                    <label>Query</label>
                    <textarea type='text' />
                </div>
            </div>
            <div className={classes.button}>
                <button>Submit </button>
            </div>
            <div className={classes.socials}>
                <div className={classes.location}>
                    <h4>COME VISIT US!</h4>
                    <p>Tayouneh Chiyah, Beirut Lebanon</p>
                </div>
                <div className={classes.icons}>
                    <h4>FOLLOW OUR SOCIALS</h4>
                    <img src={socials} alt='' color='black'/>
                </div>
            </div>
        </div>
    </div>
  )
}

export default Contactus