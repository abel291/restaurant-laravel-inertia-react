//import { useState } from "react"
//import useContact from "../../hooks/useContact"

const Form = () => {
    // const contactMutation = useContact()
    // const [dataForm, setDataForm] = useState({
    //     name: "user",
    //     email: "ad@ad.com",
    //     subject: "Lorem Ipsum is simply dummy text of the printing ",
    //     message: "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.",
    // })
    // const handleSubmitForm = (e) => {
    //     e.preventDefault()
    //     contactMutation.mutate(dataForm)
    // }
    // const handleChangeInput = (e) => {
    //     let target = e.target

    //     setDataForm({ ...dataForm, [target.name]: target.value })
    // }
    return (
        <label htmlFor="">dd</label>
        // <>
        //     <div className="max-w-xl mx-auto text-center">
        //         <h5 className="title-section">PONERSE EN CONTACTO</h5>
        //         <p className="mt-5 font-light text-lg">
        //             Aliquam a augue suscipit, luctus neque purus ipsum neque undo dolor primis libero tempus, blandit a cursus varius magna
        //         </p>
        //     </div>

        //     <form onSubmit={handleSubmitForm} className="mt-10">
        //         <div className="grid grid-cols-1 md:grid-cols-2 gap-3">
        //             <input
        //                 value={dataForm.name}
        //                 onChange={handleChangeInput}
        //                 className="h-14 "
        //                 type="text"
        //                 name="name"
        //                 required
        //                 placeholder="Tu nombre*"
        //             />
        //             <input
        //                 value={dataForm.email}
        //                 onChange={handleChangeInput}
        //                 className="h-14 "
        //                 type="email"
        //                 name="email"
        //                 required
        //                 placeholder="Email *"
        //             />
        //             <input
        //                 value={dataForm.subject}
        //                 onChange={handleChangeInput}
        //                 className="h-14  md:col-span-2"
        //                 type="text"
        //                 name="subject"
        //                 required
        //                 placeholder="De qué trata esto?"
        //             />
        //             <textarea
        //                 value={dataForm.message}
        //                 onChange={handleChangeInput}
        //                 className="md:col-span-2"
        //                 name="message"
        //                 rows="6"
        //                 required
        //                 placeholder="Tu mensaje ..."
        //             ></textarea>
        //             <div className="md:col-span-2 text-right">
        //                 <button disabled={contactMutation.isLoading} className="btn btn-lg btn-red disabled:opacity-50" type="submit">
        //                     {contactMutation.isLoading ? "enviando...." : "Enviar mensaje"}
        //                 </button>
        //                 {contactMutation.isSuccess && (
        //                     <div className="mt-4 text-lg text-green-500 font-medium">
        //                         <span>Mensaje enviado con exito ,nos pondremos en contacto contigo lo antes posible</span>
        //                     </div>
        //                 )}
        //             </div>
        //         </div>
        //     </form>
        // </>
    )
}

export default Form
